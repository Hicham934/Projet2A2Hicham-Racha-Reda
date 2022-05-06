
#include <stddef.h>
#include <curl/curl.h>
#include <json-c/json.h>

char * returnStr ;

void function_pt(void *str, size_t size, size_t nmemb, void *stream){
    
    struct json_object  *weather;
    struct json_object  *json;
    struct json_object  *main;
    struct json_object  *description;


    json = json_tokener_parse(str);
    json_object_object_get_ex(json, "weather", &weather);
    json_object_object_get_ex(json_object_array_get_idx(weather, 0), "main", &main);
    json_object_object_get_ex(json_object_array_get_idx(weather, 0), "description", &description);
  

    const char *char_meteo = json_object_get_string(main);
     const char *char_meteo1 = json_object_get_string(description);
     

    printf("%s\n", char_meteo) ;
    printf("Nous retrouvons un %s\n", char_meteo1) ;

}

int main(int argc, char**argv){
     MYSQL *conn;
    MYSQL_RES *res;
    MYSQL_ROW row;

    char *server = "localhost";
    char *user = "root";
    char *password = "root";
    char *database = "EnDeaVor";

    conn = mysql_init(NULL);

    printf("Lancement...\n");   

    if (!mysql_real_connect(conn, server, user, password, database, 0, NULL, 0)) {
        printf("erreur: %s\n", mysql_error(conn));
        return EXIT_FAILURE;
    }

    int insertWeather(struct weatherStruct Weather, MYSQL *conn){

 char request[4096] = "INSERT INTO Weather(main, description,) VALUES (";

 strcat(request, "'");
 strcat(request, Weather.main);
 strcat(request, "', '");
 strcat(request, Weather.description);
 strcat(request, "', '");

 if (mysql_query(conn, request )) {
     fprintf(stderr, "%s\n", mysql_error(conn));
     return EXIT_FAILURE;
 }
}

    CURL *curl;
    curl = curl_easy_init();

    curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_easy_setopt(curl, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?q=Paris&lang=fr&units=metric&appid=c94774637f7989b95a5afb142b94130d");
    curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, function_pt);

    CURLcode ret = curl_easy_perform(curl);
    curl_easy_cleanup(curl);


     return EXIT_SUCCESS;
}