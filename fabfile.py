from fabric.api import run, roles, execute, task, sudo, env, parallel
from fabric.contrib import console
from fabric.operations import put, local
from fabric import utils
import posixpath
from fabric.operations import prompt, require
from fabric.context_managers import cd

code_repo = 'https://github.com/dimagi/wordpress-theme.git'
env.code_branch = 'master'

# env.warn_only = True

env.root = '/'
env.user = 'dimagi'
env.hostname = 'dimagi'

@task
def _setup_path():
    # using posixpath to ensure unix style slashes. See bug-ticket: http://code.fabfile.org/attachments/61/posixpath.patch
    env.theme_root = repo = posixpath.join(env.root, 'wp-content/themes/dimagi-theme')
    env.user = prompt("Username: ", default=env.user)
    env.hosts = ['%(user)s@%(hostname)s.wpengine.com' % env]


@task
def production():
    """ use production environment on dimagi.com"""
    env.environment = 'production'
    
    _setup_path()
    

@task
def staging():
    """ use staging environment on dimagi.com"""
    env.user = 'dimagi-staging'
    env.hostname = 'dimagi.staging'
    env.environment = 'staging'
    env.code_branch = 'staging'

    _setup_path()


@task
def deploy():
    """ Deploy to remote host. """
    
    if not console.confirm('Are you sure you want to deploy from github to %(environment)s?' % env, default=False):
        utils.abort('Deployment aborted.')
    local('cd dimagi-theme')
    local("find . -name '*.DS_Store' -delete")
    local('cd ../')
    put('dimagi-theme', '/wp-content/themes/')
    # local('mkdir sync_%(environment)s' % env)
#     local('sudo sshfs %(user)s@%(host)s:%(theme_root)s sync_%(environment)s' % env)
    
    
#     run('sshfs %(user)s@%(host)s:%(theme-root)s sync' % env)

    # with cd(env.repo_root):
#         run('git checkout %(code_branch)s' % env)
#         run('git pull --rebase origin %(code_branch)s' % env)
#         run('rm -r %(theme_root)s' % env)
#         run('cp -r %(repo_theme)s %(theme_root)s' % env)
#         if env.environment == 'staging':  
#           run('cp style-beta.css %(theme_root)s/style.css' % env)
