<div id="commentaires"
     class="row no-gutters rounded overflow-hidden flex-md-row mb-4  ">

    <?php $comments_args = array(
        // Change the title of send button
        'label_submit' => __( 'Envoyer', 'textdomain' ),
        'submit_button' => "<button class='btn btn-success'>Envoyer le commentaire</button>",
        // Change the title of the reply section

        'title_reply' => __( 'Un témoignage?  Laissez un commentaire.', 'textdomain' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',

        'fields' => apply_filters('comment_form_default_fields', [

            'author' => '<label for="author"> Votre nom :</label>
                             <br>
                            <input id="author" name="author" type="text" value="" placeholder="Nom" required>
                            <br>',

            'email'  => '<label for="email">Votre adresse email :</label>
                             <br>
                            <input id="email" name="email" type="email" value="" placeholder="Email" required>'
        ]),


        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="w-100"><label for="comment">'
            . _x( 'Commentaire', 'nom' )
            . '</label><br />
                <textarea 
                id="comment" 
                name="comment"
                rows="5" 
                cols="22"
                placeholder="Commentaire"
                aria-required="true">
                
                </textarea></p>
                ',
    );

    comment_form( $comments_args );
    ?>

    <ol class="col p-4 d-flex">
        <?php
        // La fonction qui liste les commentaires
        wp_list_comments( [
            'avatar_size' => 60,
            'max_depth'   => 5,
            'style'       => 'ol',
            'short_ping'  => true,
            'type'        => 'comment',
        ]);
        ?>
    </ol>
