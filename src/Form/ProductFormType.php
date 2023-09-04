<?php

namespace App\Form;

use App\Entity\Product;
use App\Form\ProductFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\DependencyInjection\Loader\Configurator\string;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', string::class,[
                'label' => 'Nom:',
                'required' => true
            ])
            ->add('SKU', int::class, [
                'label' => 'SKU:',
                'required' => true
            ])
            ->add('category_id', int::class, [
                'label' => 'IdCategory:'

            ])
            ->add('inventory_id', int::class , [
                'label' => 'IdInventory:'
            ])
            ->add('price', int::class, [
                'label' => 'Prix:',
                'required' => true
            ])
            ->add('discount_id', int::class, [
                'label' => 'Discount'
            ])
            ->add('created_at', Date)
            ->add('modified_at', Date)
            ->add('deleted_at', Date)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
