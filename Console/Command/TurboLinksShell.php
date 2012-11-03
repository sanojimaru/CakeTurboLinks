<?php
define('CAKE_TURBOLINKS_PLUGIN_ROOT', ROOT.DS.'app'.DS.'Plugin'.DS.'CakeTurboLinks'.DS);
require CAKE_TURBOLINKS_PLUGIN_ROOT.'Vendor/CoffeeScript/src/CoffeeScript/Init.php';

class TurboLinksShell extends AppShell {
    public function initialize() {
        CoffeeScript\Init::Load();

    }

    public function install() {
        // Download and compile lastest stable turbolinks.js.coffee
        $this->out('Downloading turbolinks.js.coffee...');
        $turbolinks_coffee_content = file_get_contents("https://raw.github.com/rails/turbolinks/master/lib/assets/javascripts/turbolinks.js.coffee");

        try {
            $turbolinks_filename = 'turbolinks.js';
            $turbolinks_filepath = CAKE_TURBOLINKS_PLUGIN_ROOT.'webroot'.DS.'js'.DS.$turbolinks_filename;

            $this->out('Compiling turbolinks.js.coffee to javascript...');
            $turbolinks_js_content = CoffeeScript\Compiler::compile($turbolinks_coffee_content, array('filename' => $turbolinks_filename));
            file_put_contents($turbolinks_filepath, $turbolinks_js_content);

            $this->out("Created js file: {$turbolinks_filepath}");
        } catch (Exception $e) {
            $this->error($e);
        }

        // output
        $message = <<<EOF
--------------------------------------------------------------------------------
CakeTurboLinks is now installed!!
Execute intall command at first time.

    \$ APP_ROOT/Console/cake CakeTurboLinks.TurboLinks Install

And insert follow tag into head tag in your layout file(default.ctp).

    <?php echo echo \$this->Html->script('/cake_turbo_links/js/turbolinks.js'); ?>

--------------------------------------------------------------------------------
EOF;
        $this->out($message);
    }
}
