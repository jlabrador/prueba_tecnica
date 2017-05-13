<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class Candidato extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Datos', array('class' => 'col-md-9'))
                ->add('email', 'text')
                ->add('nombre', 'text')
                ->add('fechaHoraPrueba', 'datetime')
                ->add('notaPrueba', 'text', array('required' => false))
                ->add('fechaHoraEntrevista', 'datetime', array('required' => false))
                ->add('notaEntrevista', 'text', array('required' => false))
                ->add('urlPrueba', 'text', array('required' => false))
                ->add('observaciones', 'textarea', array('required' => false))
            ->end()

            ->with('Estado de la prueba', array('class' => 'col-md-3'))
            ->add('estado', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Estado',
            ))
            ->end()
        ;

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('email');
        $datagridMapper->add('nombre');
        $datagridMapper->add('fechaHoraPrueba');
        $datagridMapper->add('notaPrueba');
        $datagridMapper->add('fechaHoraEntrevista');
        $datagridMapper->add('notaEntrevista');
        $datagridMapper->add('estado');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('nombre');
        $listMapper->addIdentifier('fechaHoraPrueba');
        $listMapper->addIdentifier('notaPrueba');
        $listMapper->addIdentifier('fechaHoraEntrevista');
        $listMapper->addIdentifier('notaEntrevista');
        $listMapper->addIdentifier('observaciones');
        $listMapper->addIdentifier('estado');
    }
}