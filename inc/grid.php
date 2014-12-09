<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
$args = sc_get_args();
$members = new WP_Query($args);
?>
<div id="sc_our_team" class="<?php echo esc_html( get_option('sc_our_team_template') ); ?>">
    <div class="clear"></div>
    <?php
    if ($members->have_posts()) {
        while ($members->have_posts()) {
            $members->the_post();
            ?>
            <div itemscope itemtype="http://schema.org/Person" class="sc_team_member">
                <div class="sc_team_member_inner">
                    <?php
                    
                    if (has_post_thumbnail())
                        echo the_post_thumbnail('medium');
                    else {
                        echo '<img src="' . SC_TEAM_PATH . 'img/noprofile.jpg" class="attachment-medium wp-post-image"/>';
                    }
                    ?>
                    <div class="sc_team_member_overlay">
                        <div itemprop="name" class="sc_team_member_name">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">                            
                                <?php the_title() ?>
                            </a>
                        </div>
                        <div itemprop="jobtitle" class="sc_team_member_jobtitle">
                            <?php echo get_post_meta(get_the_ID(), 'team_member_title', true); ?>
                        </div>
                        <div class='icons'>

                            <?php // the_content();   ?>
                            <?php
                            $facebook = get_post_meta(get_the_ID(), 'team_member_facebook', true);
                            $twitter = get_post_meta(get_the_ID(), 'team_member_twitter', true);
                            $linkedin = get_post_meta(get_the_ID(), 'team_member_linkedin', true);
                            $gplus = get_post_meta(get_the_ID(), 'team_member_gplus', true);
                            $email = get_post_meta(get_the_ID(), 'team_member_email', true);

                            get_social($facebook, $twitter, $linkedin, $gplus, $email);
                            ?>

                        </div>                           
                    </div>

                </div>

            </div>
            <?php
        }
    } else {
        echo 'There are no team members to display';
    }
    ?>
    <div class="clear"></div>
</div>
