<?php
/**
 * This customer class is a simple value object representing a customer.
 * It's very basic and only contains an id and e-mail field.
 */
class Customer extends DomainObject
{
    public $id;
    public $email;

    /**
     * @param array|null $values
     * @param null|UnitOfWork $unitOfWork
     */
    public function __construct(array $values = null, UnitOfWork $unitOfWork = null)
    {
        if ($unitOfWork instanceof UnitOfWork) {
            $this->setUnitOfWork($unitOfWork);
        }


        if ( ! empty($values)) {
            foreach ($values as $field => $value) {
                if (property_exists($this, $field)) {
                    $this->{$field} = $value;
                }
            }

            // Mark ourselves as new, if no unit of work has been defined, it's silently ignored
            $this->markAsNew();
        }
    }
}
