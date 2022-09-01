<?php
namespace Pyz\Zed\FaqForm\Business\Form;

use Elastica\ResultSet\DefaultBuilder;
use Pyz\Zed\Faq\Communication\Table\FaqTable;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Generated\Shared\Transfer\FaqTransfer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


interface FaqFormInterface
{

    /**
     * @return string
     */
    public function getBlockPrefix(): string;

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver);

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void;

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return \Pyz\Zed\Faq\Communication\Form\FaqForm
     */
    function addNameField(FormBuilderInterface $builder): FaqForm;

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    function addAnswerField(FormBuilderInterface $builder): FaqForm;

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    function addActiveField(FormBuilderInterface $builder): FaqForm;

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    function addSubmitButton(FormBuilderInterface $builder): FaqForm;

}
