<?php

namespace Yazdan\Slider\Repositories;

use Yazdan\Slider\App\Models\Slider;

class SliderRepository
{
    const TYPE_MAIN = 'main';
    const TYPE_CTA = 'cta';

    static $types = [self::TYPE_CTA, self::TYPE_MAIN];


    public static function all()
    {
        return Slider::query()->orderBy("priority")->get();
    }


    public static function findById($id)
    {
        return Slider::findOrFail($id);
    }

    public static function store($data)
    {
        return Slider::create([
            'priority' => $data->priority,
            'media_id' => $data->media_id,
            'link' => $data->link,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
            'type' => $data->type,
        ]);
    }

    public static function update($id, $data)
    {
        Slider::where('id', $id)->update([
            'priority' => $data->priority,
            'media_id' => $data->media_id,
            'link' => $data->link,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
            'type' => $data->type,
        ]);
    }

    public function delete($id)
    {
        Slider::where('id', $id)->delete();
    }
}



