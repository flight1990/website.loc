<?php

namespace Modules\Pages\Actions;

class FindPageBySlugAction extends BaseAction
{
    public function run($slug)
    {
        return $this->model->query()
            ->select(['title', 'content', 'meta_keywords', 'meta_description'])
            ->whereSlug($slug)
            ->where('is_active', 1)
            ->firstOrFail();
    }
}
