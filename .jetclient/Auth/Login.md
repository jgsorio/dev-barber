```toml
name = 'Login'
method = 'POST'
url = '{{base_url}}/auth/login'
sortWeight = 2000000
id = '6731f93a-d927-4bc7-bb25-26dc48291d62'

[[headers]]
key = 'Content-Type'
value = 'application/json'

[[headers]]
key = 'Accept'
value = 'application/json'

[body]
type = 'JSON'
raw = '''
{
  email: "joseguilhermesorio@gmail.com",
  password: "Amor*2013#"
}'''
```
