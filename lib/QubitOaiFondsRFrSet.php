<?php

/**
 * An OAI set for the fonds Radio Fribourg.
 *
 * @author     TWI BCU Fribourg 2022
 */
class QubitOaiFondsRFrSet implements QubitOaiSet
{
    public function contains($record)
    {
        /* Allow the collection set to take responsibility for records to preserve
         * the current behaviour. */
        return false;
    }

    public function setSpec()
    {
        return 'oai:virtual:bcu-fonds-radio-fribourg-records';
    }

    public function getName()
    {
        return 'BCU fonds Radio Fribourg';
    }

    public function apply($criteria)
    {
        $criteria->add(QubitInformationObject::PARENT_ID, null, Criteria::ISNOTNULL);

        $criteria->add(QubitInformationObject::LFT, 463590, Criteria::GREATER_EQUAL);
        $criteria->add(QubitInformationObject::RGT, 465969, Criteria::LESS_EQUAL);
    }
}