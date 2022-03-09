<?php

declare(strict_types=1);

namespace Worksome\PrettyPest\Contracts;

use Worksome\PrettyPest\Support\FunctionDetail;

interface Fixer
{
    /**
     * Returns all top level function calls in the given file.
     *
     * @return array<int, FunctionDetail>
     */
    public function getFunctions(): array;

    /**
     * Get the function call at the given token pointer in the file.
     */
    public function getFunction(int $ptr): FunctionDetail|null;

    /**
     * Add an error with the provided message. Returning true
     * indicates that the error can be fixed automatically.
     */
    public function addError(int $ptr, string $message): bool;

    /**
     * Remove the given function call from the file.
     */
    public function deleteFunction(FunctionDetail $functionDetail): void;

    /**
     * Insert the given function call into the file at the specified token pointer.
     */
    public function insertContent(string $content, int $ptr): void;
}