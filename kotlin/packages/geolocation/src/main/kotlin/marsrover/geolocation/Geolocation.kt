package marsrover.geolocation

enum class Orientation { EAST, NORTH, SOUTH, WEST }

data class Coordinates(val x: Int, val y: Int)

data class Location(val coordinates: Coordinates, val orientation: Orientation)
