<?php
/**
 * All entity "value objects" should extend this domain object
 *
 */
abstract class DomainObject
{
    /**
     * @var UnitOfWork
     */
    private $unitOfWork;

    /**
     * @param UnitOfWork $unitOfWork
     * @return DomainObject
     */
    public function setUnitOfWork(UnitOfWork $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
        return $this;
    }


    /**
     * @return UnitOfWork
     */
    public function getUnitOfWork()
    {
        return $this->unitOfWork;
    }


    /**
     * Return true if a unit of work object has been defined for the entity.
     *
     * @return bool
     */
    public function hasUnitOfWork()
    {
        return ($this->unitOfWork instanceof UnitOfWork);
    }


    /**
     * Mark this entity as new. New means that it's created during this request and has not yet been stored.
     */
    public function markAsNew()
    {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerNew($this);
        }
    }


    /**
     * Mark this entity as deleted. Deleted means that the object is marked for deletion.
     */
    public function markAsDeleted()
    {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerDeleted($this);
        }
    }


    /**
     * Mark this entity as dirty. Dirty means that it has been altered during our request.
     */
    public function markAsDirty()
    {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerDirty($this);
        }
    }
}
