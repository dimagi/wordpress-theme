from fabric.api import run, roles, execute, task, sudo, env, parallel
from fabric.contrib import console
from fabric import utils
import posixpath
from fabric.operations import prompt, require
from fabric.context_managers import cd

env.code_repo = 'https://github.com/dimagi/wordpress-theme.git'
env.code_branch = 'master'
env.root = root = '/home/content/d/i/m/dimagi'
env.hosts = ['dimagi.com']
env.user = 'dimagi'
theme = posixpath.join(root, 'html/wp/wp-content/themes')

@task
def _setup_path():
    # using posixpath to ensure unix style slashes. See bug-ticket: http://code.fabfile.org/attachments/61/posixpath.patch
    env.repo_root = repo = posixpath.join(root, 'sites/wordpress-theme')
    env.repo_theme = posixpath.join(repo, 'dimagi-4')
    env.user = prompt("Username: ", default=env.user)


@task
def production():
    """ use production environment on dimagi.com"""
    env.theme_root = posixpath.join(theme, 'dimagi-4')
    env.environment = 'production'
    
    _setup_path()
    

@task
def staging():
    """ use staging environment on dimagi.com"""
    env.theme_root = posixpath.join(theme, 'dimagi-beta')
    env.environment = 'staging'
    env.code_branch = 'staging'

    _setup_path()


@task
def deploy():
    """ Deploy to remote host. """
    require('root', provided_by=('staging', 'production'))
    if env.environment == 'production':
        if not console.confirm('Are you sure you want to deploy from github to production?', default=False):
            utils.abort('Production deployment aborted.')

    with cd(env.repo_root):
        run('git checkout %(code_branch)s' % env)
        run('git pull --rebase origin %(code_branch)s' % env)
        run('rm -r %(theme_root)s' % env)
        run('cp -r %(repo_theme)s %(theme_root)s' % env)
        if env.environment == 'staging':  
          run('cp style-beta.css %(theme_root)s/style.css' % env)
