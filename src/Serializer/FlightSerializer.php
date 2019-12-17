<?php


namespace App\Serializer;


use App\Entity\Flight;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class FlightSerializer implements ContextAwareNormalizerInterface
{

    /**
     * {@inheritdoc}
     *
     * @param array $context options that normalizers have access to
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Flight;
    }

    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param mixed $object Object to normalize
     * @param string $format Format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array|string|int|float|bool|\ArrayObject|null \ArrayObject is used to make sure an empty object is encoded as an object not an array
     *
     * @throws InvalidArgumentException   Occurs when the object given is not a supported type for the normalizer
     * @throws CircularReferenceException Occurs when the normalizer detects a circular reference when no circular
     *                                    reference handler can fix it
     * @throws LogicException             Occurs when the normalizer is not called in an expected context
     * @throws ExceptionInterface         Occurs for all the other cases of errors
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return [
            "id" => $object->getId(),
            "departure_airport" => $object->getDepartureAiport(),
            "arrival_airport" => $object->getArrivalAirport(),
            "departure_datetime" => $object->getDepartureDatetime()->format("d-m-Y"),
            "arrival_datetime" => $object->getArrivalDatetime()->format("d-m-Y"),
            "pilot" => $object->getMainPilot()
        ];
    }
}