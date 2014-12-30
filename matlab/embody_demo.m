%% Short matlab demo to load and visualize emBODY data
%
% - Please note that there are hard-coded parameters related to our
% experiment version. If you modify the graphic layout of the web tool you
% will need to change also how matlab loads the data
% - In our experiment we treated the left part of the screen as positive
% values and the right part as negative values, and performed a subtraction
% between the two. You are free to use the whole painting area and you
% don't need to subtract the values if left and right silouhettes have
% different meanings than activation/deactivation.
% - The demo uses the function load_subj, make sure it is in your path
% - It should be easy to rewrite this in python for those without a Matlab
% license.


% let's begin
close all
clear all

% get a list of subjects
basepath='demo_subjects'; % folder where subjects are
subjects=dir([basepath '/*']);

% the base image used for painting (in our case only one sided since we
% subtract values)
base=



% for each subject, load data
for s=1:length(subjects)
    % skip dot and dotdot folders
    if(strcmp(subjects(s).name(1),'.')) continue; end 

    %% Data loading
    % let's load the subject's answers into a variable a
    data=load_subj([basepath '/' subjects(s).name],2);
    NC=length(a); % number of conditions
    
    %% Painting reconstruction
    % 'data' now contains all mouse movements. What we need are the mouse
    % locations while the button was pressed (i.e. during painting)
    % Furthermore, the painting tool has a brush size. We recreate that
    % using image filter
    
    for n=1:S;
        T=length(a(n).paint(:,2)); % number of mouse locations
        over=zeros(size(base,1),size(base,2)); % empty matrix to reconstruct painting
        for t=1:T
            y=ceil(a(n).paint(t,3)+1);
            x=ceil(a(n).paint(t,2)+1);
            if(x<=0) x=1; end
            if(y<=0) y=1; end
            if(x>=900) x=900; end % hardcoded for our experiment, you need to change it if you changed layout
            if(y>=600) y=600; end % hardcoded for our experiment, you need to change it if you changed layout
            over(y,x)=over(y,x)+1;
        end
        % Simulate brush size with a gaussian disk
        h=fspecial('gaussian',[15 15],5);
        over=imfilter(over,h);
        % we subtract left part minus right part of painted area
        % values are hard-coded to our web layout
        over2=over(10:531,33:203,:)-over(10:531,696:866,:);
        resmat(:,:,n)=over2;
    end
    % store result (commented)
    % save([subjects(s).name '_preprocessed.mat'],'resmat')
    
    % visualize subject's data
end





    
    