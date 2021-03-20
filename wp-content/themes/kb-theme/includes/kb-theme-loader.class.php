<?php

/**
 * Class KB_Theme_Loader
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Loader {

    /**
     * @var array
     */
    protected $actions;

    /**
     * @var array
     */
    protected $filters;

    /**
     * Initialize the list of actions and filters.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->actions = array();
        $this->filters = array();
    }

    /**
     * Register all the actions and filters in WordPress.
     *
     * @since 1.0.0
     */
    public function run()
    {
        foreach ($this->filters as $hook) {
            if (!is_null($hook['component'])) {
                $callback = array(
                    $hook['component'],
                    $hook['callback'],
                );
            } else {
                $callback = $hook['callback'];
            }

            add_filter(
                $hook['hook'],
                $callback,
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        foreach ($this->actions as $hook) {
            if (!is_null($hook['component'])) {
                $callback = array(
                    $hook['component'],
                    $hook['callback'],
                );
            } else {
                $callback = $hook['callback'];
            }

            add_action(
                $hook['hook'],
                $callback,
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }

    /**
     * This method add a new action to the action list, that will be registered on WordPress.
     *
     * @param String $hook The hook name action that is being registered.
     * @param object $component The instance of object on which the action is defined.
     * @param String $callback The name of the function definition on the $component.
     * @param int $priority (Optional). The priority at which the function will be loaded, by Default is set 10.
     * @param int $args_numbers (Optional). The number of arguments that will be passed to the $callback, Default is 1.
     * @since 1.0.0
     */
    public function add_action($hook, $component, $callback, $priority = 10, $args_numbers = 1)
    {
        $this->actions = $this->add(
            $this->actions,
            $hook,
            $component,
            $callback,
            $priority,
            $args_numbers
        );
    }

    /**
     * This method add a new filter to the action list, that will be registered on WordPress.
     *
     * @param String $hook The hook name filter that is being registered.
     * @param object $component The instance of object on which the filter is defined.
     * @param String $callback The name of the function definition on the $component.
     * @param int $priority (Optional) The priority at which the function will be loaded, by Default is set 10.
     * @param int $args_numbers (Optional) The number of arguments that will be passed to the $callback, Default is 1.
     * @since 1.0.0
     */
    public function add_filter($hook, $component, $callback, $priority = 10, $args_numbers = 1)
    {
        $this->filters = $this->add(
            $this->filters,
            $hook,
            $component,
            $callback,
            $priority,
            $args_numbers
        );
    }

    /**
     * This function is used to load the actions and hooks into a single list.
     *
     * @param array $hooks The list of hooks(actions or filters) that is being registered.
     * @param String $hook The name filter that is being registered.
     * @param object $component The instance of object on which the filter is defined.
     * @param String $callback The name of the function definition on the $component.
     * @param int $priority The priority at which the function will be loaded, by Default is set 10.
     * @param int $args_numbers The number of arguments that will be passed to the $callback, by Default is set 1.
     * @return array The list of actions and filters registered in WordPress.
     * @since 1.0.0
     * @access private
     */
    private function add($hooks, $hook, $component, $callback, $priority, $args_numbers)
    {
        $hooks[] = array(
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $args_numbers,
        );

        return $hooks;
    }
}
