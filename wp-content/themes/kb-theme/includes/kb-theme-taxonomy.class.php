<?php

class KB_Theme_Taxonomy {

    /**
     * @var string
     */
    protected $post_type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $rewrite;

    /**
     * KB_Theme_Taxonomy constructor.
     * @param string $name
     * @param string $post_type
     * @param string $slug
     * @param string $rewrite
     */
    public function __construct(string $post_type, string $name, string $slug, string $rewrite)
    {
        $this->post_type = $post_type;
        $this->name = $name;
        $this->slug = $slug;
        $this->rewrite = $rewrite;
    }

    public function register_custom_taxonomy()
    {
        register_taxonomy(
            $this->slug,
            $this->post_type,
            array(
                'label' => __($this->name),
                'rewrite' => array('slug' => $this->rewrite),
                'hierarchical' => true,
            )
        );
    }
}
