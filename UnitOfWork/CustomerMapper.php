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
     * @var DAO
     */
    private $dao;


    /**
     * @param DAO $dao
     */
    public function __construct(/*DAO $dao*/)
    {
        //$this->dao = $dao;
    }


    /**
     * Create a new Customer value object, from a DAO statement object.
     *
     * @static
     * @param DAOStmt $stmt
     * @return Customer
     */
    static public function createFromStatement(DAOStmt $stmt = null)
    {
        // Execute the query
        //$stmt->execute();

        // Retrieve the data and populate the Customer value object
        //return new Customer($stmt->fetchAssoc());
        return new Customer(array('email' => 'John@doe.edu'));
    }


    /**
     * This call could benefit from an "Identity Map" object
     *
     * @param int $customerId
     */
    public function findById($customerId)
    {
        //$stmt = $this->dao->prepare('SELECT id, email FROM customer WHERE id = ?');
        //$stmt->bind(array($customerId));

        return static::createFromStatement(/*$stmt*/);
    }


    /**
     * Update the dirty object
     *
     * @param Customer $customer
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
     * @param Customer $customer
     */
    public function insert(Customer $customer)
    {
        // .. Insert logic
    }


    /**
     * Delete a customer
     *
     * @param Customer $customer
     */
    public function delete(Customer $customer)
    {
        // .. You've guessed it.
    }
}
