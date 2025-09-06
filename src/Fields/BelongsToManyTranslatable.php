<?php

namespace Nathaniel3456\NovaAstrotranslatable\Fields;

use Laravel\Nova\Fields\BelongsToMany;
use Nathaniel3456\NovaAstrotranslatable\Rules\NotExactlyAttachedTranslatable;

class BelongsToManyTranslatable extends BelongsToMany
{
    /**
     * Set allow same relation rules.
     *
     * @return $this
     */
    public function allowDuplicateRelations()
    {
        return $this->creationRules(function ($request) {
            return [
                new NotExactlyAttachedTranslatable($request, $request->findModelOrFail()),
            ];
        });
    }
}
