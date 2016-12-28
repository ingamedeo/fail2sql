
Fail2SQL v1.1 by Amedeo Baragiola <ingamedeo[at]gmail.com>

============
Fail2SQL
============

1. Create a new MySQL database and associated user
2. Import fail2ban.sql into your new MySQL database
3. Edit fail2sql (nano fail2sql) and change PATH and SQL details [including db name] at the top of the file.
4. Update Geo IP Database (./fail2ban -u)
5. Copy fail2sql.conf to /etc/fail2ban/action.d/fail2sql.conf
6. Edit /etc/fail2ban/action.d/fail2sql.conf and change the PATH of fail2sql accordingly

You can either create a custom action or use the default one: in your jail.local look for:

```
action_ = %(banaction)s[name=%(__name__)s, port="%(port)s", protocol="%(protocol)s", chain="%(chain)s"]
```

and replace it with:

```
action_sql = %(banaction)s[name=%(__name__)s, port="%(port)s", protocol="%(protocol)s", chain="%(chain)s"]
               fail2sql[name=%(__name__)s, port="%(port)s", protocol="%(protocol)s", chain="%(chain)s"]
```

Then enable the new action by replacing:

```
action = %(action_)s -> action = %(action_sql)s
```

============
Output
============

1	ssh	tcp	22	XXX.YYY.ZZZ.WW  1	54.1	76.180	IT	Milan, Italy	2016-12-28 11:56:28


============
Check out my code!
============

* Clone this repo

```sh
git clone https://github.com/ingamedeo/fail2sql.git
```

============
Credits
============

[https://github.com/frdmn/fail2sql](https://github.com/frdmn/fail2sql)
[https://github.com/durzo/fail2sql](https://github.com/durzo/fail2sql)


