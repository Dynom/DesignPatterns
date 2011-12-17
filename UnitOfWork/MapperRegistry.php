<?php

/**
 * A very basic mapper registry. It simply searches for a class named $className + "Mapper" if none is found,
 * hell breaks loose. Each found mapper is created and injected with a DAO object. Once created it's stored to the
 * mapper container to prevent loading multiple objects.
 */
class MapperRegistry
{
    /**
     * @var DAO
     */
    private $dao;

    /**
     * @var array
     */
    private $mapperContainer = array();


    /**
     * Return the mapper for a certain domainObject
     *
     * @param \DomainObject $entityName
     * @return \MapperAbstract
     * @throws Exception
     */
    public function getMapperForDomainObject(DomainObject $domainObject)
    {
        return $this->getMapperForClassName(get_class($domainObject));
    }


    /**
     * Return the mapper for a class name
     *
     * @param string $className
     * @return \MapperAbstract
     * @throws Exception
     */
    public function getMapperForClassName($className)
    {
        $mapperClassName = $className .'Mapper';

        // If we already loaded the mapper, return that instance.
        if (isset($this->mapperContainer[ $mapperClassName ])) {
            return $this->mapperContainer[ $mapperClassName];
        }

        // Else, check if the class exists
        if ( ! class_exists($mapperClassName, true)) {
            throw new Exception('Unable to locate the class "'. $mapperClassName .'".');
            // Throw an exception
        }

        // Store the mapper in our container.
        $this->mapperContainer[ $mapperClassName ] = new $mapperClassName( $this->getDao() );

        return $this->mapperContainer[ $mapperClassName ];
    }


    /**
     * @param \DAO $dao
     * @return \MapperRegistry
     */
    public function setDao(DAO $dao)
    {
        $this->dao = $dao;
        return $this;
    }


    /**
     * @return \DAO
     */
    public function getDao()
    {
        return $this->dao;
    }
}
