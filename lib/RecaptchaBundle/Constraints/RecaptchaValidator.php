<?php
namespace  Ghalins\RecaptchaBundle\Constraints;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use ReCaptcha\ReCaptcha;


class RecaptchaValidator extends ConstraintValidator
{
    /**
     * @var RequestStack
     */
    private $requestStack;
    /**
     * @var \ReCaptcha\ReCaptcha
     */
    private $reCaptcha;

    public function __construct(RequestStack $requestStack,ReCaptcha $reCaptcha)
    {

        $this->requestStack = $requestStack;
        $this->reCaptcha = $reCaptcha;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        $request = $this->requestStack->getCurrentRequest();
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
//        if ($recaptchaResponse===null)
        if (empty($recaptchaResponse))
        {
            $this->addViolation($constraint);
            return;
        }
        $response=$this->reCaptcha
            ->setExpectedHostname($request->getHost())
            ->verify($recaptchaResponse, $request->getClientIp());
        if (!$response->isSuccess())
        {
            $this->addViolation($constraint);
        }
    }
    private function  addViolation (Constraint $constraint)
    {
        $this->context->buildViolation($constraint->message)->addViolation();
    }
}