# Timestamp-Microservice

Timestamp Microservice API project for FCC 

# User stories:
1. can pass a string as a parameter, and it will check to see whether that string contains either a unix timestamp or a natural language date (example: January 1, 2016)
2. If it does, it returns both the Unix timestamp and the natural language form of that date.
3. If it does not contain a date or Unix timestamp, it returns null for those properties.

# Project

  https://fierce-woodland-57978.herokuapp.com/timestamp.php

# Example Usage
  https://fierce-woodland-57978.herokuapp.com/timestamp.php/December%2015,%202015
  
  https://fierce-woodland-57978.herokuapp.com/timestamp.php/1450137600
  
 # Example output:
  { "unix": 1450137600, "natural": "December 15, 2015" }
