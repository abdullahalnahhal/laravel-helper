# Laravel Helper

	null|User user()

fetches the current authenticated user

    boolean isGuardA(String $guardName = 'web')
checks if the guard is the given guard

##### Parameters
---

String $guardName &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the guard name to check

    Illuminate\Http\Request requestWithUpload(Request $request, string $name)
makes upload for file then returns a new request just with file name .

##### Parameters
---
Request $request &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; object that has the http request
string $name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;file field name

    Request requestWithUploadArray(Request $request, string $name)

makes multiple upload for file then returns a new request just with file name .

##### Parameters
---

Request $request &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; object that has the http request
string $name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;file field name

    string nameLogo(string $name)

returns a string of a name with first letters

##### Parameters
---

string $name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; name to make its logo

    Response message($status = true, $data = [], $message = '', $code = 200)

returns the api responses

##### Parameters
---

boolean $status &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; status true success false for failure .<br/>
array $data &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; object will be sent .<br/>
string $message &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; message will be sent .<br/>
integer  $code &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; for response code .<br/>

    string colors(int $key)

returns random bootstrap color .<br>

##### Parameters
---

int $key &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; color key .

    array excelColsByNumbers(int $number)

returns array of excel columns<br>

##### Parameters
---

int $number &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; number of columns

    Carbon carbon(string $date = null)

instantiate Carbon<br>

##### Parameters
---

string $date

    bool isMultiDimentionalArray(array $array)

checks wether the array is multidimentional array or not .<br>

##### Parameters
---

array $array &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; array to be checked .

    array array_flatten(array $array)

makes multidimentional array to be flat array .<br/>

##### Parameters
---

array $array &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; array wanted to be converted .<br/>

    string trimAllSpaces(string $string) 

removes all spaces from text

##### Parameters
---

string $string &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; string wanted to be trimmed .<br/>

    string explodeCaps(string $string)

explode string on caps only

##### Parameters
---

string $string &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; string wanted to be exploded .<br/>

    string implodeToLower(string $delimiter, array $array)

implode all array elements with lower case

##### Parameters
---

string $delimiter &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; string to implode by .<br/>
array $array &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; array to implode its elements .<br/>


    array unsetByValue(array $array, $value)

unset attribute from array using its value

##### Parameters
---

array  $array &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wanted to unset from . <br/>
mixed $value &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wanted to unset by . <br/>

    string ddSql(Builder $query)

makes dump for query that dump its sql and its bindings .

##### Parameters
---

Builder $query &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; query wanted to be dumped . <br/>

    string toSqlWithBindings(Builder $query)

return sql query as string with its binding in single string .

##### Parameters
---

Builder $query &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; query builder wanted to get sql from .

    string td()

makes dd with trace information

    void lDebug(string $msg)

makes log debug wit readable tracing comments


##### Parameters
---

string $msg &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; message wanted to debug with .