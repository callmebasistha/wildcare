<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $size, $extensions, $files, $label;
    public function __construct($files, $extensions, $size)
    {
        $this->files = $files;
        $this->size = $size;
        $this->extensions = $extensions;
        $this->label = '';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $error = false;
        $this->label = $attribute;
        foreach ($this->files as $key => $file) {
            $fileSize = $file->getSize() / 1024 / 1024;
            $extension = getExtension($file);
            if ($fileSize <= $this->size && in_array($extension, $this->extensions)) {
                $error = true;
                break;
            }
        }
        return $error;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The ' . $this->label . ' size must be less or equal to ' . $this->size . ' MB and type ' . implode(', ', $this->extensions) . '.';
    }
}
