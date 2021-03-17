import os 
# install angr first 
import angr
import timeit

elf = raw_input('bin name : ' )
project = angr.Project(elf, auto_load_libs=True)

x='y'
while x == 'y':
    path_group = project.factory.simulation_manager()
    search = raw_input('search for ! : ' )
    start = timeit.default_timer()
    path_group.explore(find=lambda path: search in path.state.posix.dumps(1))
    
    stop = timeit.default_timer()
    
    print('Time: ', stop - start)  
    for i in path_group.found:
        print (i.state.posix.dumps(0))
    x = raw_input('do another search ?? : ')
