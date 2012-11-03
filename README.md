# CakeTurboLinks

Turbolinks information is here: https://github.com/rails/turbolinks

## Installation

If you using git in your project, you can install it with git-submodule.

    cd ROOT
    git submodule add git@github.com:sanojimaru/CakeTurboLinks.git app/Plugin/CakeTurboLinks

or not, please download to ROOT/app/Plugin/CakeTurboLinks.
Next, run install command.

    cd ROOT/app
    Console/cake CakeTurboLinks.TurboLinks Install

And insert follow tag into head tag in your layout file.
(default layout is here: ROOT/app/View/Layout/default.ctp)

    <?php echo echo \$this->Html->script('/cake_turbo_links/js/turbolinks.js'); ?>
