<?php

namespace AppBundle\Command;

use AppBundle\Entity\Candidato;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class EnviarPruebaTecnicaCommand extends ContainerAwareCommand
{
    private $output;
    
    protected function configure()
    {
        $this
            ->setName('laliga:enviar-prueba-tecnica')
            ->setDescription('Envía un email al candidato con la prueba técnica')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $style = new OutputFormatterStyle('red', 'yellow', array('bold'));
        $output->getFormatter()->setStyle('fire', $style);
        $output->writeln('<fire>Generando y enviando email al candidato... </fire>');
        $this->output = $output;
        $em = $this->getContainer()->get('doctrine')->getManager();
        $candidatos = $em->getRepository('AppBundle:Candidato')->findByFechaHoraPrueba(new \DateTime('now'));
        /** @var Candidato $candidato */
        foreach ($candidatos as $candidato){

            $message = \Swift_Message::newInstance()
                ->setSubject('Prueba técnica de LaLiga')
                ->setFrom('jose.labrador.gonzalez@gmail.com')
                ->setTo($candidato->getEmail())
                ->setBody(
                    $this->getContainer()->get('twig')->render(
                    // app/Resources/views/Emails/registration.html.twig
                        'default/prueba.html.twig',
                        array('nombre', $candidato->getNombre())
                    ),
                    'text/html'
                )
            ;
            $message->attach(\Swift_Attachment::fromPath(__DIR__.'/../../../web/data/Prueba técnica LaLiga .docx'));

            $this->getContainer()->get('mailer')->send($message);

        }

    }
}
