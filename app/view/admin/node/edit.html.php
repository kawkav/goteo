<?php

use Goteo\Library\Text,
    Goteo\Model,
    Goteo\Core\Redirection,
    Goteo\Library\NormalForm;

$node = $vars['node'];

if (!$node instanceof Model\Node) {
    throw new Redirection('/admin');
}
?>
<form method="post" action="/admin/node/edit" enctype="multipart/form-data">

    <?php echo new NormalForm(array(

        'action'        => '',
        'level'         => 3,
        'method'        => 'post',
        'title'         => '',
        'class'         => 'aqua',
        'footer'        => array(
            'view-step-preview' => array(
                'type'  => 'submit',
                'name'  => 'save-node',
                'label' => Text::get('regular-save'),
                'class' => 'next'
            )
        ),
        'elements'      => array(
            'name' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'Nombre',
                'value'     => $node->name,
            ),
            'subtitle' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'Título',
                'value'     => $node->subtitle,
            ),

            'description' => array(
                'type'      => 'TextArea',
                'cols'      => 40,
                'rows'      => 4,
                'title'     => 'Presentación',
                'value'     => $node->description
            ),

            'logo' => array(
                'type' => 'Hidden',
                'value' => $node->logo->id,
            ),

            'thelogo' => array(
                'type'      => 'group',
                'title'     => 'Logo',
                'class'     => 'user_avatar',
                'children'  => array(
                    'logo_upload'    => array(
                        'type'  => 'file',
                        'label' => Text::get('form-image_upload-button'),
                        'class' => 'inline avatar_upload'
                    ),
                    'logo-image' => array(
                        'type'  => 'HTML',
                        'class' => 'inline avatar-image',
                        'html'  => is_object($node->logo) ?
                                   $node->logo . '<img src="' . SITE_URL . '/image/' . $node->logo->id . '/128/128" alt="Avatar" /><button class="image-remove" type="submit" name="logo-'.$node->logo->hash.'-remove" title="Quitar este logo" value="remove">X</button>' :
                                   ''
                    )

                )
            ),

            'label' => array(
                'type' => 'Hidden',
                'value' => $node->label->id,
            ),

            'thelabel' => array(
                'type'      => 'group',
                'title'     => 'Sello',
                'class'     => 'user_avatar',
                'children'  => array(
                    'label_upload'    => array(
                        'type'  => 'file',
                        'label' => Text::get('form-image_upload-button'),
                        'class' => 'inline avatar_upload'
                    ),
                    'label-image' => array(
                        'type'  => 'HTML',
                        'class' => 'inline avatar-image',
                        'html'  => is_object($node->label) ?
                                   $node->label . '<img src="' . SITE_URL . '/image/' . $node->label->id . '/128/128" alt="Avatar" /><button class="image-remove" type="submit" name="label-'.$node->label->hash.'-remove" title="Quitar este sello" value="remove">X</button>' :
                                   ''
                    )

                )
            ),

            'twitter' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'Twitter',
                'value'     => $node->twitter,
            ),

            'facebook' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'facebook',
                'value'     => $node->facebook,
            ),

            'google' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'Google +',
                'value'     => $node->google,
            ),

            'linkedin' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'LInkedin',
                'value'     => $node->linkedin,
            ),

            'location' => array(
                'type'      => 'TextBox',
                'size'      => 20,
                'title'     => 'Localización',
                'value'     => $node->location
            )

        )

    ));
    ?>

</form>
