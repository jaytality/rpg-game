package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
)

const (
	DB_USER     = "rpguser"
	DB_PASSWORD = "rpgpass"
	DB_NAME     = "rpgdata"
)

// set up the DB connection
func setupDB() *sql.DB {
	dbinfo := fmt.Sprintf("user=%s password=%s dbname=%s sslmode=disable", DB_USER, DB_PASSWORD, DB_NAME)
	db, err := sql.Open("mysql", dbinfo)

	checkErr(err)

	return db
}

// user
type User struct {
	UserID string `json:"userid"`
	UserEmail string `json:"useremail"`
	UserCreated string `json:"usercreated"`
}

func main() {
	// router
	router := mux.NewRouter()

// user routes
	// get all users
	router.HandleFunc("/users/", GetUsers).Methods("GET")

	// create a user
	router.HandleFunc("/users/", CreateUser).Methods("POST")
}

// end of file

