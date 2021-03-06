<?php

namespace Tests\Exceptions;

use Meveto\Client\Exceptions\Validation\InputDataInvalidException;
use Meveto\Client\Exceptions\Validation\KeyNotValidException;
use Meveto\Client\Exceptions\Validation\StateRequiredException;
use Meveto\Client\Exceptions\Validation\StateTooShortException;
use Meveto\Client\Exceptions\Validation\ValueNotValidAtException;
use Meveto\Client\Exceptions\Validation\ValueRequiredAtException;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidationTest.
 */
class ValidationTest extends TestCase
{
    /**
     * Test ValueRequiredAtException.
     */
    public function testValueRequiredAt(): void
    {
        // create the exception instance.
        $exception = new ValueRequiredAtException('place', 'foo');

        // assert message matches (partially).
        static::assertStringContainsString(
            '`foo` is required inside `place` array',
            $exception->getMessage()
        );
    }

    /**
     * Test ValueNotValidAtException.
     */
    public function testValueNotValidAt(): void
    {
        // create the exception instance.
        $exception = new ValueNotValidAtException('place', 'foo', 'bar');

        // assert message matches (partially).
        static::assertStringContainsString(
            '`foo` has an invalid value inside `place` array. It must be a valid `bar`',
            $exception->getMessage()
        );
    }

    /**
     * Test KeyNotValidException.
     */
    public function testKeyNotValid(): void
    {
        // create the exception instance.
        $exception = new KeyNotValidException('foo', 'bar');

        // assert message matches (partially).
        static::assertStringContainsString(
            'Your `foo` array has an unexpected key `bar`.',
            $exception->getMessage()
        );
    }

    /**
     * Test InputDataInvalidException.
     */
    public function testInputDataInvalid(): void
    {
        // create the exception instance.
        $exception = new InputDataInvalidException([ 'a', 'b']);

        // assert message matches (partially).
        static::assertStringContainsString(
            'The following errors occurred while processing your request: (`a`, `b`)',
            $exception->getMessage()
        );
    }

    /**
     * Test StateRequiredException.
     */
    public function testStateRequired(): void
    {
        // create the exception instance.
        $exception = new StateRequiredException();

        // assert message matches (partially).
        static::assertStringContainsString(
            'Current application request state can not be empty.',
            $exception->getMessage()
        );
    }

    /**
     * Test StateTooShortException.
     */
    public function testStateTooShort(): void
    {
        // create the exception instance.
        $exception = new StateTooShortException(42);

        // assert message matches (partially).
        static::assertStringContainsString(
            'Current application request state must be at least `42` characters long.',
            $exception->getMessage()
        );
    }
}
