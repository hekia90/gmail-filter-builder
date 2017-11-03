<?php

namespace Opdavies\GmailFilterBuilder;

class Filter
{
    private $properties = [];

    public function has($value)
    {
        $this->properties['hasTheWord'] = $value;

        return $this;
    }

    public function from()
    {
        $this->properties['from'] = collect(func_get_args())
            ->map(function ($address) {
                return trim($address);
            })->implode(',');

        return $this;
    }

    public function label($label)
    {
        $this->properties['label'] = $label;

        return $this;
    }

    public function archive()
    {
        $this->properties['shouldArchive'] = 'true';

        return $this;
    }

    public function labelAndArchive($label)
    {
        $this->label($label)->archive();

        return $this;
    }

    public function spam()
    {
        $this->properties['shouldSpam'] = 'true';
        $this->properties['shouldNeverSpam'] = 'false';

        return $this;
    }

    public function neverSpam()
    {
        $this->properties['shouldSpam'] = 'false';
        $this->properties['shouldNeverSpam'] = 'true';

        return $this;
    }

    public function trash()
    {
        $this->properties['shouldTrash'] = 'true';

        return $this;
    }

    public function read()
    {
        $this->properties['markAsRead'] = 'true';

        return $this;
    }

    public function star()
    {
        $this->properties['shouldStar'] = 'true';

        return $this;
    }

    public function forward($to)
    {
        $this->properties['forwardTo'] = $to;

        return $this;
    }

    public function important()
    {
        $this->properties['shouldAlwaysMarkAsImportant'] = 'true';

        return $this;
    }

    public function notImportant()
    {
        $this->properties['shouldNeverMarkAsImportant'] = 'true';

        return $this;
    }

    public function categorise($category)
    {
        $this->properties['smartLabelToApply'] = $category;

        return $this;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
