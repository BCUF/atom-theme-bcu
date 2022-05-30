<?php

/**
 * An OAI set for all BCU (collection) records.
 *
 * @author     TWI BCU Fribourg 2022
 */
class QubitOaiBcuSet implements QubitOaiSet
{
    public function contains($record)
    {
        /* Allow the collection set to take responsibility for records to preserve
         * the current behaviour. */
        return false;
    }

    public function setSpec()
    {
        return 'oai:virtual:bcu-records';
    }

    public function getName()
    {
        return 'BCU record set';
    }

    public function apply($criteria)
    {
        $criteria->add(QubitInformationObject::LEVEL_OF_DESCRIPTION_ID, 221);
        # only published
        $criteria->add(QubitStatus::TYPE_ID, 158);
        $criteria->add(QubitStatus::STATUS_ID, 160);
        # not already in Primo
        $criteria->addJoin(QubitSlug::OBJECT_ID, QubitInformationObject::ID);

        $c1 = $criteria->getNewCriterion(QubitSlug::SLUG, 'archnumfr%', Criteria::NOT_LIKE);
        $c2 = $criteria->getNewCriterion(QubitSlug::SLUG, 'mms-id%', Criteria::NOT_LIKE);
        $c1->addAnd($c2);
        $criteria->addAnd($c1);
    }
}