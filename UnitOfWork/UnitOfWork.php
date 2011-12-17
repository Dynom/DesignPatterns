<?php
/**
 * The Unit of Work object.
 *
 * There are actually quite a few flavors of this pattern. The basic idea, however,
 * stays the same. This object is responsible for tracking objects and their state,
 * allowing for an optimized way of storing the objects to your backend. And a way
 * to keep a transaction in your application request.
 */
class UnitOfWork
{
    /**
     * @var \MapperRegistry
     */
    private $mapperRegistry;

    /**
     * @var array
     */
    private $dirtyObjects = array();

    /**
     * @var array
     */
    private $newObjects = array();

    /**
     * @var array
     */
    private $deletedObjects = array();


    /**
     * @param MapperRegistry $mapperRegistry
     */
    public function __construct(MapperRegistry $mapperRegistry)
    {
        $this->mapperRegistry = $mapperRegistry;
    }


    /**
     *
     */
    public function commit()
    {
        // Inserts the new objects
        foreach ($this->newObjects as $newObject) {
            $mapper = $this->mapperRegistry->getMapperForDomainObject($newObject);
            $mapper->insert($newObject);
        }

        // Update the dirty objects
        foreach ($this->dirtyObjects as $updateObject) {
            $mapper = $this->mapperRegistry->getMapperForDomainObject($updateObject);
            $mapper->update($updateObject);
        }

        // Delete the removed
        foreach ($this->deletedObjects as $deletedObject) {
            $mapper = $this->mapperRegistry->getMapperForDomainObject($deletedObject);
            $mapper->delete($deletedObject);
        }
    }


    /**
     * @param DomainObject $object
     */
    public function registerDirty(DomainObject $object)
    {
        $this->dirtyObjects[ spl_object_hash($object) ] = $object;
    }


    /**
     * Register an object as dirty. This is valid unless:
     * - The object is registered to be removed
     * - The object is registered as dirty (has been changed)
     * - The object is already registered as new
     *
     * @param DomainObject $object
     */
    public function registerNew(DomainObject $object)
    {
        // Check if we meet our criteria.
        if ($this->isDeleted($object)) {
            throw new Exception('Cannot register as new, object is marked for deletion.');
        }

        if ($this->isDirty($object)) {
            throw new Exception('Cannot register as new, object is marked as dirty.');
        }

        if ($this->isNew($object)) {
            throw new Exception('Cannot register as new, object is already marked as new.');
        }

        $this->newObjects[ spl_object_hash($object) ] = $object;
    }


    /**
     * @param DomainObject $object
     */
    public function registerDeleted(DomainObject $object)
    {
        $this->deletedObjects[ spl_object_hash($object) ] = $object;
    }


    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDirty(DomainObject $object)
    {
        return isset($this->dirtyObjects[ spl_object_hash($object) ]);
    }


    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isNew(DomainObject $object)
    {
        return isset($this->newObjects[ spl_object_hash($object) ]);
    }


    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDeleted(DomainObject $object)
    {
        return isset($this->deletedObjects[ spl_object_hash($object) ]);
    }
}
