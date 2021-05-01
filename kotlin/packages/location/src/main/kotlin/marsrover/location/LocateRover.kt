package marsrover.location

import marsrover.geolocation.Location

class LocateRoverHandler(private val findLatestLocation: FindLatestLocation) {

    fun handle(): Location {
        return findLatestLocation.find()
    }
}

interface FindLatestLocation {

    fun find(): Location
}
