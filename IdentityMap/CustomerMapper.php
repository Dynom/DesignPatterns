<?php
/**
 * The customer mapper, this object is responsible for loading and saving customer objects. This class follows the
 * "Data Mapper" pattern.
 *
 * This way of loading/storing of objects is quite verbose, since if you follow this design you'll need a mapper and
 * value object combination for every entity. This should be extending an abstract to avoid repetition,
 * but to keep it simple I've put it in a single class.
 *
 * The code that is commented out, is something how it could work. But it's there only for illustration purposes in
 * this example. I've replaced it with static contents to make it work.
 */
class CustomerMapper
{
    /**
     * The Data access object
     * @var \DAO
     */
    private $dao;

    /**
     * @var \IdentityMap|null
     */
    private $map;


    /**
     * @param \DAO $dao
     * @param \IdentityMap $map
     */
    public function __construct(DAO $dao, IdentityMap $map = null)
    {
        $this->dao = $dao;
        $this->map = $map;
    }


    /**
     * This call could benefit from an "Identity Map" object
     *
     * @param int $customerId
     */
    public function findById($customerId)
    {
        // Request our Identity Map first.
        $customer = $this->getIdentityMap()->get('Customer', $customerId);
        if ($customer instanceof Customer) {
            return $customer;
        }

        /*
         * Normally some code would be here to actually fetch from our database.
         */

        $customer = new Customer(array('email' => 'John@doe.edu', 'id' => $customerId));

        // If we got a valid match, update our Identity Map.
        if ($customer instanceof Customer) {
            $this->getIdentityMap()->set('Customer', $customer);
        }

        return $customer;
    }


    /**
     * Update the dirty object
     *
     * @param \Customer $customer
     */
    public function update(Customer $customer)
    {
        // .. Some update logic

        //$this->dao->prepare('UPDATE customer SET email = ? WHERE id = ?');
        //..
    }


    /**
     * Insert a new customer
     *
     * @param \Customer $customer
     */
    public function insert(Customer $customer)
    {
        // .. Insert logic
    }


    /**
     * Delete a customer
     *
     * @param \Customer $customer
     */
    public function delete(Customer $customer)
    {
        // .. You've guessed it.
    }


    /**
     * Return the defined identity map
     *
     * @return \IdentityMap|null
     * @throws \Exception
     */
    public function getIdentityMap()
    {
        if ( ! $this->map instanceof IdentityMap) {
            throw new Exception('No Identity Map has been defined.');
        }

        return $this->map;
    }


    /**
     * Allow a identity map to be defined, after construction. It's not recommended to do this manuall, since it can
     * be easily forgotten. Instead do this, e.g., with a factory and automate the process.
     *
     * @param \IdentityMap $map
     * @return \CustomerMapper
     */
    public function setIdentityMap(IdentityMap $map)
    {
        $this->map = $map;
        return $this;
    }
}
