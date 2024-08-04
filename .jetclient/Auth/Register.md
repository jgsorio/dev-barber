```toml
name = 'Register'
method = 'POST'
url = '{{base_url}}/auth/register'
sortWeight = 1000000
id = '0f762d0d-2480-475c-bd53-80eccc0cb708'

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
  name: "Ana Paula Duarte",
  email: "aninha_pdds@hotmail.com",
  password: "Amor*2013#"
}'''
```
