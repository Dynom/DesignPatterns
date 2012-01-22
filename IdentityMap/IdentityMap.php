<?php
/**
 * @author Mark van der Velden <mvdvelden@ibuildings.nl>
 */
class IdentityMap
{
    /**
     * @var array
     */
    private $container = array();


    /**
     * Setting an entity object.
     *
     * This can be simplified even further, by not accepting an entity name but use the name of the object. I choose
     * not to do that, to be more consistent in this example. In production code I probably would, however.
     *
     * @param $entityName
     * @param \EntityInterface $object
     * @return IdentityMap
     */
    public function set($entityName, EntityInterface $object)
    {
        if (isset($this->container[$entityName][$object->getId()])) {
            // At this point, the key already exists, this might be something we want to act against.
            // To keep it simple, I don't do anything in this example.
        }

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        $this->container[$entityName][$object->getId()] = $object;

        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }


    /**
     * Return an entity
     *
     * @param $entityName
     * @param $id
     * @return \EntityInterface|null
     */
    public function get($entityName, $id)
    {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        if ( ! isset($this->container[$entityName][$id])) {
            return null;
        }

        return $this->container[$entityName][$id];
    }
}
