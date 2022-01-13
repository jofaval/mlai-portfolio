# M.L. && A.I. - Portfolio #
Portfolio of all my Machine Learning and Artificial Intelligence projects and "background".
It may be mixed with Data Science/Analysis of the given results. Or maybe even full projects.

## Website
Using a bit of background as a Web Developer I created my website from scratch and serve it as static files so it renders as fast as possible.

### Hosted on
[mlai.jofaval.com](https://mlai.jofaval.com)

### Structure
A little more detail about the folder structure can be found [here](./docs/en/Structure.md)

#### Why MLAI?
It comes from **M**achine **L**earning and **A**rtificial **I**ntelligence. It's a nice acronym and it wouldn't be mistaken so easily with other variations, since `aiml` for example, is already used in computing science for `AIML` (**A**rtificial **I**ntelligence **M**ark-up **L**anguage)

### Uses
- Self-built "pseudo-compiler" for blazing fast loads and easy page design
- Minify external library
- ImageMagick library

### Bob The Builder

Bob The Builder is an observer that helps you not having to use the CLI that much, or at all!

This will boot Bob
```shell
php bob
```

And now that Bob is booted you can freely work on the public files without having to rebuild them manually

### CLI
**C**ommand **L**ine **I**nterface, it's the built-in utility for bash interaction with the actions.

#### Compile the site

```shell
php cli build
```

Or 
```shell
php cli rebuild file[.php]
```
for a specific file

#### Generate the sitemap

```shell
php cli sitemap
```

#### Deploy
It does a 
```shell
php cli build
```
internally and a
```shell
php cli sitemap
```

For this to work you'll need to create a `production/config.py` with the variables [ `host` : `str`, `port` : `int`, `username` : `str`, `password` : `str` ]


```shell
php cli deploy
```

#### PWA
Generates all the necessary information to create a PWA with the information given


```shell
php cli pwa
```

## Experience

All my experience

### Background
I come from a Software and Web Development background (Computer Science related). But I started in the world of IT with graphic design, and by chance I was introduced to computing. One thing led to another and here we are =).

### Motivation
Everyone's talking about A.I., Machine Learning and Big Data these days, all around the news, computer science is taking a new big step, why not gaze into it?!

### Projects
None... atm.