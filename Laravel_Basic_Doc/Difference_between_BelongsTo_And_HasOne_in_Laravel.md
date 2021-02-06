## We can define the inverse of a hasOne relationship using the belongsTo method. Take simple example with User and Phone models.

## I'm giving hasOne relation from User to Phone.
```
class User extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }
}
```
