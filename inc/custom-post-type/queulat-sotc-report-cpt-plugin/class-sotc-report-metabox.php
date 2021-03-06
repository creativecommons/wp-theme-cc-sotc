<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\Input;
use Queulat\Forms\Element\WP_Image;
use Queulat\Forms\Element\WP_Media;
use Queulat\Forms\Element\Select;


class Report_Metabox extends Metabox
{
    public function __construct($id = '', $title = '', $post_type = '', array $args = array()) {
        parent::__construct($id, $title, $post_type, $args);
    }
    public function get_site_pages() {
        $return = array(
            '' => 'Select page'
            );
        $pages = get_pages();
        foreach ($pages as $page) {
            $return[$page->ID] = $page->post_title;
        }
        return $return;
    }
    public function get_site_categories() {
        $return = array(
            '' => 'Select category'
            );
        $categories = get_terms('sotc_year');
        foreach ($categories as $category) {
            $return[$category->term_id] = $category->name;
        }
        return $return;
    }
    public function get_fields() : array
    {
         wp_enqueue_media();
        return [
             Node_Factory::make(
                Input::class,
                [
                    'name' => 'year',
                    'label' => 'Feature Year',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Year of the annual report',
                    ]
                ]
            ),
            Node_Factory::make(
                Input::class,
                [
                    'name' => 'subtitle',
                    'label' => 'Feature Subtitle',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Text below the year'
                    ]
                ]
            ),
            Node_Factory::make(
                WP_Image::class,
                [
                    'name' => 'background',
                    'label' => 'Background image',
                    'properties' => [
                        'description' => 'Size recommended 2000x700 px'
                    ]
                ]
            ),
            Node_Factory::make(
                WP_Media::class,
                [
                    'name' => 'background_video',
                    'label' => 'Background Video',
                    'properties' => [
                        'description' => 'Extended recommended : .webm '
                    ]
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'welcome_page',
                    'label' => 'Welcome Page',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select welcome page'
                    ],
                    'options' => $this->get_site_pages()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'highlights_tag',
                    'label' => 'Highlight categories',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select Highlight category'
                    ],
                    'options' => $this->get_site_categories()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'impact_tag',
                    'label' => 'Impact categories',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select Impact category'
                    ],
                    'options' => $this->get_site_categories()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'data_tag',
                    'label' => 'License categories',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select License category'
                    ],
                    'options' => $this->get_site_categories()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'platform_tag',
                    'label' => 'Platform categories',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select Platform category'
                    ],
                    'options' => $this->get_site_categories()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'financial_tag',
                    'label' => 'Financial categories',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select Financial category'
                    ],
                    'options' => $this->get_site_categories()
                ]
            ),
            Node_Factory::make(
                Select::class,
                [
                    'name' => 'thanks_page',
                    'label' => 'Thanks Page',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Select Thanks page'
                    ],
                    'options' => $this->get_site_pages()
                ]
            ),
        ];
    }
    public function sanitize_data(array $data) : array
    {
        //Delete stats transient to update the global chapter stats
        $sanitized = [];
        foreach ($data as $key => $val) {
            switch ($key) {
                case 'year':
                    $sanitized[$key] = $val;
                    break;
                case 'subtitle':
                    $sanitized[$key] = $val;
                    break;
                case 'background':
                    $sanitized[$key] = $val;
                    break;
                case 'background_video':
                    $sanitized[$key] = $val;
                    break;
                case 'welcome_page':
                    $sanitized[$key] = $val;
                    break;
                case 'highlights_tag':
                    $sanitized[$key] = $val;
                    break;
                case 'impact_tag':
                    $sanitized[$key] = $val;
                    break;
                case 'data_tag':
                    $sanitized[$key] = $val;
                    break;
                case 'platform_tag':
                    $sanitized[$key] = $val;
                    break;
                case 'financial_tag':
                    $sanitized[$key] = $val;
                    break;
                case 'thanks_page':
                    $sanitized[$key] = $val;
                    break;
            }
        }
        return $sanitized;
    }
}

new Report_Metabox('report', 'Report data', 'sotc_report', ['context' => 'normal']);