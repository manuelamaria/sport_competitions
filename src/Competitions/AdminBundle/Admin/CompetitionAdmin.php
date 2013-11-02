<?php 

namespace Competitions\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CompetitionAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'       => 1,
        '_sort_by'    => 'start_date',
        '_sort_order' => 'ASC'
    );
    
    protected $baseRouteName = 'competitions';
    protected $baseRoutePattern = 'competitions';
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
                ->add('description')
                ->add('start_date')
                ->add('end_date')
                ->add('location')
                ->add('website')
                ->add('categories', null, array('expanded' => true))
//                ->add('logo', 'file', array('data_class' => null))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
                ->add('description')
                ->add('start_date')
                ->add('location')
                ->add('categories')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('start_date')
            ->add('end_date')
            ->add('location')
            ->add('website')
        ;
    }
}

?>