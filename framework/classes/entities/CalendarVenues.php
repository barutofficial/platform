<?php
namespace CASHMusic\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * CalendarVenues
 *
 * @Table(name="calendar_venues")
 * @Entity
 */
class CalendarVenues extends EntityBase
{

    protected $fillable;
    /**
     * @var string
     *
     * @Column(name="name", type="text", length=65535, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @Column(name="address1", type="text", length=65535, nullable=true)
     */
    protected $address1;

    /**
     * @var string
     *
     * @Column(name="address2", type="text", length=65535, nullable=true)
     */
    protected $address2;

    /**
     * @var string
     *
     * @Column(name="city", type="text", length=65535, nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @Column(name="region", type="text", length=65535, nullable=true)
     */
    protected $region;

    /**
     * @var string
     *
     * @Column(name="country", type="text", length=65535, nullable=true)
     */
    protected $country;

    /**
     * @var string
     *
     * @Column(name="postalcode", type="text", length=65535, nullable=true)
     */
    protected $postalcode;

    /**
     * @var float
     *
     * @Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    protected $latitude;

    /**
     * @var float
     *
     * @Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    protected $longitude;

    /**
     * @var string
     *
     * @Column(name="url", type="text", length=65535, nullable=true)
     */
    protected $url;

    /**
     * @var string
     *
     * @Column(name="phone", type="text", length=65535, nullable=true)
     */
    protected $phone;

    /**
     * @var integer
     *
     * @Column(name="creation_date", type="integer", nullable=true)
     */
    protected $creationDate;

    /**
     * @var integer
     *
     * @Column(name="modification_date", type="integer", nullable=true)
     */
    protected $modificationDate;

    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=true)
     */
    protected $userId = '-1';

    /** @Id @Column(type="integer") @GeneratedValue(strategy="AUTO") **/
    protected $id;

}

