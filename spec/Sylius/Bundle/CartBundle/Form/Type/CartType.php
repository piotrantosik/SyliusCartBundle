<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\CartBundle\Form\Type;

use PHPSpec2\ObjectBehavior;

/**
 * Cart form spec.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class CartType extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Cart');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\CartBundle\Form\Type\CartType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    /**
     * @param Symfony\Component\Form\FormBuilder $builder
     */
    function it_builds_form_with_items_collection($builder)
    {
        $builder
            ->add('items', 'collection', array('type' => 'sylius_cart_item'))
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    /**
     * @param Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    function it_defines_assigned_data_class($resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Cart'))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }
}
