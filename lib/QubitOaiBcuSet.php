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

        # only published
        $criteria->add(QubitStatus::TYPE_ID, 158);
        $criteria->add(QubitStatus::STATUS_ID, 160);
        # and not already in Primo
        $criteria->addJoin(QubitSlug::OBJECT_ID, QubitInformationObject::ID);
        # not in Primo means that we don't have a slug like archnumfr or mms-id
        $c1 = $criteria->getNewCriterion(QubitSlug::SLUG, 'archnumfr%', Criteria::NOT_LIKE);
        $c2 = $criteria->getNewCriterion(QubitSlug::SLUG, 'mms-id%', Criteria::NOT_LIKE);
        $c1->addAnd($c2);
        $criteria->addAnd($c1);        

        // # take only the Fonds and Collection records
        $criteriaLevelOfDescription = $criteria->getNewCriterion(QubitInformationObject::LEVEL_OF_DESCRIPTION_ID, 223);
        $criteriaLevelOfDescription2 = $criteria->getNewCriterion(QubitInformationObject::LEVEL_OF_DESCRIPTION_ID, 221);
        $criteriaLevelOfDescription->addOr($criteriaLevelOfDescription2);

        // or the records in relation with the term OAI-PMH
        $in_query = '%s IN (SELECT object_term_relation.object_id FROM term_i18n, object_term_relation WHERE term_i18n.id = object_term_relation.term_id and term_i18n.name = \'OAI-PMH\')';
        $in_query = sprintf($in_query, QubitInformationObject::ID);
        $criteriaOaiPmh = $criteria->getNewCriterion(QubitInformationObject::ID, $in_query, Criteria::CUSTOM);

        $criteriaOaiPmh->addOr($criteriaLevelOfDescription);

        $criteria->addAnd($criteriaOaiPmh);
    }
}