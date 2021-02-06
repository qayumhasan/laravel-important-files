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

## Using this relation, I'm able to get Phone model data using User model.
## But it is not possible with Inverse process using HasOne. Like Access User model using Phone model.
## If I want to access User model using Phone, then it is necessary to add BelongsTo in Phone model.

```
class Phone extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
```
