<?php


class Request
{
    private $user_id;
    private $user_locale;
    private $last_post_id;
    private $last_post_time;
    private $search_context;
    private $filters;

    public function __construct($user_id, $user_locale, $last_post_id, $last_post_time, $search_context, $filters){

        $this->user_id = $user_id;
        $this->user_locale = $user_locale;
        $this->last_post_id = $last_post_id;
        $this->last_post_time = $last_post_time;
        $this->search_context = $search_context;
        $this->filters = $filters;
    }

    public function get_filter_query_statement() {
        $output = "";
        $filters = $this->filters;

        if($filters != null) {
            $count = count($filters);
            for ($i = 0; $i < $count; $i++) {
                $filter_content = Filter::filtering($filters[$i]->id, $filters[$i]->content);
                $output .= ' (' . $filter_content . ') ';
                if ($i != $count - 1)
                    $output .= 'AND';
            }
        } else {
            $output = null;
        }

        return $output != null ? trim(" AND ".$output) : "";
    }

    public function get_last_post_id_condition()
    {
        return $this->last_post_id != -1
            ? "AND `post`.`id` < ".$this->last_post_id.""
            : "";
    }

    public function get_title_regexp_condition(){
        return $this->search_context != null
            ? "AND `post`.`title` REGEXP \"(".$this->search_context.")\""
            : "";
    }

    public function get_locale_ordering_condition() {
        return $this->user_locale != null
            ? ", `user`.`locale` = \"".$this->user_locale."\""
            : "";
    }

    public function get_locale_condition() {
        return $this->user_locale != null
            ? "AND `user`.`locale` = \"".$this->user_locale."\""
            : "";
    }

    public function get_last_time_condition() {
        return $this->last_post_time != null
            ? "AND `pubtime` > \"".$this->last_post_time."\""
            : "";
    }

    public function get_post_liked() {
        return $this->user_id != null;
    }

    public function getLastPostTime(){return $this->last_post_time;}
    public function getUserId(){return $this->user_id;}
}