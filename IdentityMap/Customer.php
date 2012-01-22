<?php
/**
 * This customer class is a simple value object representing a customer.
 * It's very basic and only contains an id and e-mail field.
 */
class Customer implements EntityInterface
{
    public $id;
    public $email;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        if ( ! empty($values)) {
            foreach ($values as $field => $value) {

                // Here we check if properties exist. For a real-work application I would probably make this more
                // strict and throw an exception if a field wasn't defined. Since this mean the model does not
                // correspond with our database, or other source of information. And that is a big problem.
                if (property_exists($this, $field)) {
                    $this->{$field} = $value;
                }
            }
        }
    }
}
