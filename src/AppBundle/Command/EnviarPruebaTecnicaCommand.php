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
        $fecha = new \DateTime(date('Y-m-d H:i:00'));
        $candidatos = $em->getRepository('AppBundle:Candidato')->findByFechaHoraPrueba($fecha);
        /** @var Candidato $candidato */
        foreach ($candidatos as $candidato){

            $message = \Swift_Message::newInstance()
                ->setSubject('Prueba técnica de LaLiga')
                ->setFrom('jose.labrador.gonzalez@gmail.com')
                ->setTo($candidato->getEmail())
                ->addCc('jlabrador@ext.laliga.es')
                ->addCc('jvillarejo@laliga.es')
                ->addCc('mmartinez@laliga.es')
                ->setBody(
                    $this->getContainer()->get('twig')->render(
                        'default/prueba.html.twig',
                        array('nombre', $candidato->getNombre())
                    ),
                    'text/html'
                )
            ;
            $message->attach(\Swift_Attachment::fromPath(__DIR__.'/../../../web/data/Prueba técnica LaLiga  V2.docx'));



            $this->getContainer()->get('mailer')->send($message);

            $estado = $em->getRepository('AppBundle:Estado')->find(2);
            $candidato->setEstado($estado);
            $em->flush();

        }

    }
}
