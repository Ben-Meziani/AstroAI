<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_de_lastre', TypeTextType::class,
                [
                    'label' => "Nom de l'astre"
                ]
            )
            ->add('language', ChoiceType::class,
                [
                    'label' => 'Langue',
                    'choices' => [
                        'Français' => 'french',
                        'English' => 'english',
                        'Español' => 'spanish',
                        'Italiano' => 'italian',
                        'Português' => 'portuguese',
                        'Русский' => 'russian',
                        'Deutsch' => 'german',
                        'عربي' => 'arabic',
                        '中文' => 'chinese',
                        '日本語' => 'japanese',
                        '한국어' => 'korean',
                        'हिन्दी' => 'hindi',
                        'বাংলা' => 'bengali',
                        'Türkçe' => 'turkish',
                        'Nederlands' => 'dutch',
                        'Polski' => 'polish',
                        'Українська' => 'ukrainian',
                        'Tiếng Việt' => 'vietnamese',
                        'ไทย' => 'thai',
                        'Svenska' => 'swedish',
                        'Suomi' => 'finnish',
                        'Dansk' => 'danish',
                        'Norsk' => 'norwegian',
                        'Ελληνικά' => 'greek',
                        'עברית' => 'hebrew',        
                    ],
                ]
            )
            ->add('rechercher', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
